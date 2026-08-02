<?php

namespace App\Modules\Blog\Business;

use App\Http\Requests\BlogRequestStore;
use App\Http\Requests\BlogRequestUpdate;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Repositories\SettingThemeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\ImageManager;

class BlogService
{
    protected string $pathUpload = 'admin/uploads/images/blog/';

    public function getIndexData(Request $request): array
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();
        $check = checkPermission('noticias.visualizar', $settingTheme);
        if ($check !== true) {
            return ['forbidden' => $check];
        }

        $categories = BlogCategory::active()->sorting()->get();
        $blogsQuery = Blog::with(['category']);

        if ($request->filled('title')) {
            $blogsQuery->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('date')) {
            $blogsQuery->whereDate('date', $request->date);
        }

        if ($request->filled('blog_category_id')) {
            $blogsQuery->where('blog_category_id', $request->blog_category_id);
        }

        $blogs = $blogsQuery->sorting()->paginate(60)->withQueryString();
        $commentCount = Blog::with(['comments' => function ($query) {
            $query->where('active', 0);
        }])->get();

        $blogCategory = [];
        foreach ($categories as $category) {
            $blogCategory[$category->id] = $category->title;
        }

        return compact('blogs', 'categories', 'blogCategory', 'settingTheme', 'commentCount');
    }

    public function getCreateData(): array
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user->hasRole('Super') && !$user->can('usuario.tornar usuario master') && !($user->hasPermissionTo('noticias.visualizar') && $user->hasPermissionTo('noticias.criar'))) {
            return ['forbidden' => view('admin.error.403', compact('settingTheme'))];
        }

        $categories = BlogCategory::active()->sorting()->get();
        $blogCategory = [];
        foreach ($categories as $category) {
            $blogCategory[$category->id] = $category->title;
        }

        return compact('categories', 'blogCategory');
    }

    public function getEditData(Blog $blog): array
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user->hasRole('Super') && !$user->can('usuario.tornar usuario master') && !($user->hasPermissionTo('noticias.visualizar') && $user->hasPermissionTo('noticias.editar'))) {
            return ['forbidden' => view('admin.error.403', compact('settingTheme'))];
        }

        $categories = BlogCategory::active()->sorting()->get();
        $blogCategory = [];
        foreach ($categories as $category) {
            $blogCategory[$category->id] = $category->title;
        }

        return compact('blog', 'categories', 'blogCategory');
    }

    public function store(BlogRequestStore $request): Blog
    {
        $data = $request->all();
        $data['active'] = $request->active ? 1 : 0;
        $data['super_highlight'] = $request->super_highlight ? 1 : 0;
        $data['highlight'] = $request->highlight ? 1 : 0;
        $data['slug'] = Str::slug($request->title);

        $manager = new ImageManager(new GdDriver());

        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
            $mime = $file->getMimeType();
            $filename = Str::uuid() . '.webp';
            if ($mime === 'image/svg+xml') {
                Storage::disk('public')->putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)->resize(null, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->toWebp(quality: 95)->toString();
                Storage::disk('public')->put($this->pathUpload . $filename, $image);
            }
            $data['path_image'] = $this->pathUpload . $filename;
        }

        if ($request->hasFile('path_image_thumbnail')) {
            $file = $request->file('path_image_thumbnail');
            $mime = $file->getMimeType();
            $filename = Str::uuid() . '_thumbnail.webp';
            if ($mime === 'image/svg+xml') {
                Storage::disk('public')->putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)->resize(null, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->toWebp(quality: 95)->toString();
                Storage::disk('public')->put($this->pathUpload . $filename, $image);
            }
            $data['path_image_thumbnail'] = $this->pathUpload . $filename;
        }

        DB::beginTransaction();
        $blog = Blog::create($data);
        DB::commit();

        return $blog;
    }

    public function uploadImageCkeditor(Request $request): array
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $mime = $file->getMimeType();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
            $pathUpload = 'uploads/blog_images/';
            $manager = ImageManager::gd();

            if ($mime === 'image/svg+xml') {
                Storage::disk('public')->putFileAs($pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)->resize(null, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->toWebp(quality: 95)->toString();
                Storage::disk('public')->put($pathUpload . $filename, $image);
            }

            return [
                'uploaded' => 1,
                'fileName' => $filename,
                'url' => asset('storage/' . $pathUpload . $filename),
            ];
        }

        return [
            'uploaded' => 0,
            'error' => ['message' => 'Upload falhou.'],
        ];
    }

    public function update(BlogRequestUpdate $request, Blog $blog): Blog
    {
        $data = $request->all();
        $data['active'] = $request->active ? 1 : 0;
        $data['super_highlight'] = $request->super_highlight ? 1 : 0;
        $data['highlight'] = $request->highlight ? 1 : 0;
        $data['slug'] = Str::slug($request->title);

        $manager = new ImageManager(new GdDriver());

        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
            $mime = $file->getMimeType();
            $filename = Str::uuid() . '.webp';
            if ($mime === 'image/svg+xml') {
                Storage::disk('public')->putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)->resize(null, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->toWebp(quality: 95)->toString();
                Storage::disk('public')->put($this->pathUpload . $filename, $image);
            }

            if (!empty($blog->path_image)) {
                Storage::disk('public')->delete($blog->path_image);
            }
            $data['path_image'] = $this->pathUpload . $filename;
        }

        if ($request->has('delete_path_image')) {
            if (!empty($blog->path_image)) {
                Storage::disk('public')->delete($blog->path_image);
            }
            $data['path_image'] = null;
        }

        if ($request->hasFile('path_image_thumbnail')) {
            $file = $request->file('path_image_thumbnail');
            $mime = $file->getMimeType();
            $filename = Str::uuid() . '_thumbnail.webp';
            if ($mime === 'image/svg+xml') {
                Storage::disk('public')->putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)->resize(null, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->toWebp(quality: 95)->toString();
                Storage::disk('public')->put($this->pathUpload . $filename, $image);
            }
            if (!empty($blog->path_image_thumbnail)) {
                Storage::disk('public')->delete($blog->path_image_thumbnail);
            }
            $data['path_image_thumbnail'] = $this->pathUpload . $filename;
        }

        if ($request->has('delete_path_image_thumbnail')) {
            if (!empty($blog->path_image_thumbnail)) {
                Storage::disk('public')->delete($blog->path_image_thumbnail);
            }
            $data['path_image_thumbnail'] = null;
        }

        DB::beginTransaction();
        $blog->fill($data)->save();
        DB::commit();

        return $blog;
    }

    public function delete(Blog $blog): void
    {
        Storage::disk('public')->delete($blog->path_image ?? '');
        Storage::disk('public')->delete($blog->path_image_thumbnail ?? '');
        $blog->delete();
    }

    public function destroySelected(Request $request): array
    {
        foreach ($request->deleteAll as $blogId) {
            $blog = Blog::find($blogId);

            if ($blog) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($blog)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $blogId,
                            'title' => $blog->title,
                            'slug' => $blog->slug,
                            'data' => $blog->date,
                            'path_image' => $blog->path_image,
                            'path_image_thumbnail' => $blog->path_image_thumbnail,
                            'texto' => $blog->text,
                            'sorting' => $blog->sorting,
                            'active' => $blog->active,
                            'event' => 'multiple_deleted',
                        ],
                    ])
                    ->log('multiple_deleted');
            } else {
                Log::warning("Item com ID {$blogId} não encontrado.");
            }
        }

        $deleted = Blog::whereIn('id', $request->deleteAll)->delete();

        return ['deleted' => $deleted];
    }

    public function sorting(Request $request): array
    {
        foreach ($request->arrId as $sorting => $id) {
            $blog = Blog::find($id);

            if ($blog) {
                $blog->sorting = $sorting;
                $blog->save();

                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($blog)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'title' => $blog->title,
                            'slug' => $blog->slug,
                            'data' => $blog->date,
                            'path_image' => $blog->path_image,
                            'path_image_thumbnail' => $blog->path_image_thumbnail,
                            'texto' => $blog->text,
                            'sorting' => $blog->sorting,
                            'active' => $blog->active,
                            'event' => 'order_updated',
                        ],
                    ])
                    ->log('order_updated');
            } else {
                Log::warning("Item com ID {$id} não encontrado.");
            }
        }

        return ['status' => 'success'];
    }
}
