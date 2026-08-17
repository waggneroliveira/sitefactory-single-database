<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     $permissions = [
    //         'auditoria'=>[
    //             'Visualizar',
    //         ],
    //         'categorias de produtos'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'categorias de noticias'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'contato'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'depoimento'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'email'=>[
    //             'Visualizar',
    //             'configurar smtp',
    //             'testar conexao smtp'
    //         ],
    //         'grupo'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'lead contato'=>[
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'marcas'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'missao visao e valores'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'noticias'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'notificacao'=>[               
    //             'Visualizar',
    //             'Notificacao de auditoria',
    //         ],
    //         'onde atendemos'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'parametro'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'passo a passo'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'perguntas e respostas'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'produtos'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'representantes'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'sesssao lets go'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'sesssao faq'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'slide'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'sobre nos'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'topico'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //         'usuario'=>[
    //             'Criar',
    //             'Editar',
    //             'Visualizar',
    //             'Remover',
    //             'Visualizar outros usuarios',
    //             'Atribuir grupos',
    //             'Tornar usuario master'
    //         ],
    //         'video'=>[
    //             'Criar',
    //             'Editar',                
    //             'Visualizar',
    //             'Remover'
    //         ],
    //     ];

    //     foreach($permissions as $key => $permission){
    //         foreach($permission as $value){
    //             Permission::create([
    //                 'name'=>strtolower("{$key}.{$value}")
    //             ]);
    //         }
    //     }
    // }

    public function run(): void
    {
        $modules = config('module_permissions');

        foreach ($modules as $module => $config) {

            foreach ($config['actions'] as $action) {

                Permission::firstOrCreate([
                    'name' => strtolower(
                        "{$config['permission']}.{$action}"
                    ),
                ]);

            }
        }
    }
}
