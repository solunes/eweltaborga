<?php

use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // General
        $site = \Solunes\Master\App\Site::find(1);
        $site->name = 'EwelTaborga';
        $site->domain = 'http://eweltaborga.dev/';
        $site->title = 'Ewel & Taborga Asociados';
        $site->description = 'Sin importar cuan familiarizado estés o cuan integrado en tu estrategia este el marketing mobile; combinando tu know how y nuestra expertise en el ámbito digital, podremos guiarte hacia un future de éxito.';
        $site->keywords = 'spazio, gimnasion, calacoto, la paz, bolivia, massaggio';
        $site->google_verification = '';
        $site->analytics = '';
        $site->save();
        
        // Nodos
        $node_social_network = \Solunes\Master\App\Node::create(['name'=>'social-network', 'location'=>'app', 'folder'=>'global']);
        $node_title = \Solunes\Master\App\Node::create(['name'=>'title']);
        $node_content = \Solunes\Master\App\Node::create(['name'=>'content']);
        $node_type = \Solunes\Master\App\Node::create(['name'=>'type']);
        $node_service = \Solunes\Master\App\Node::create(['name'=>'service']);
        $node_member = \Solunes\Master\App\Node::create(['name'=>'member']);
        $node_customer = \Solunes\Master\App\Node::create(['name'=>'customer']);
        $node_contact = \Solunes\Master\App\Node::create(['name'=>'contact']);
        $node_contact_form = \Solunes\Master\App\Node::create(['name'=>'contact-form', 'folder'=>'form']);

        // Menu: Home
        $page_home = \Solunes\Master\App\Page::create(['type'=>'customized', 'customized_name'=>'home', 'es'=>['name'=>'Inicio']]);
        \Solunes\Master\App\Menu::create(['page_id'=>$page_home->id]);

        // Menu: Nosotros
        $page_about = \Solunes\Master\App\Page::create(['customized_name'=>'about', 'es'=>['name'=>'Nosotros']]);
        \Solunes\Master\App\Menu::create(['page_id'=>$page_about->id]);

        // Menu: Miembros
        $page_members = \Solunes\Master\App\Page::create(['customized_name'=>'members', 'es'=>['name'=>'Miembros']]);
        \Solunes\Master\App\Menu::create(['page_id'=>$page_members->id]);

        // Menu: Servicios
        $page_services = \Solunes\Master\App\Page::create(['type'=>'customized', 'customized_name'=>'services', 'es'=>['name'=>'Servicios']]);
        \Solunes\Master\App\Menu::create(['page_id'=>$page_services->id]);

        // Menu: Contacto
        $page_contact = \Solunes\Master\App\Page::create(['customized_name'=>'contact', 'es'=>['name'=>'Contacto']]);
        \Solunes\Master\App\Menu::create(['page_id'=>$page_contact->id]);

        $admin = \Solunes\Master\App\Role::where('name', 'admin')->first();
        $member = \Solunes\Master\App\Role::where('name', 'member')->first();
        //$admin->permission_role()->attach([$products_perm->id, $accounting_perm->id, $company_perm->id, $capital_perm->id, $sales_perm->id, $agenda_perm->id]);
        //$member->permission_role()->attach([$products_perm->id, $sales_perm->id, $agenda_perm->id]);

        // Variables
        \Solunes\Master\App\Variable::create([
            'name' => 'admin_email',
            'type' => 'string',
            'es' => ['value'=>'edumejia30@gmail.com'],
        ]);
        \Solunes\Master\App\Variable::create([
            'name' => 'footer_name',
            'type' => 'string',
            'es' => ['value'=>'Ewel & Taborga'],
        ]);
        \Solunes\Master\App\Variable::create([
            'name' => 'footer_rights',
            'type' => 'string',
            'es' => ['value'=>'Asesores en Seguros y Riesgos'],
        ]);

        // Social Networks
        \App\SocialNetwork::create([
            'code' => 'facebook',
            'url' => 'https://www.facebook.com/',
        ]);
        \App\SocialNetwork::create([
            'code' => 'twitter',
            'url' => 'https://www.twitter.com/',
        ]);
        \App\SocialNetwork::create([
            'code' => 'linkedin',
            'url' => 'https://www.linkedin.com/',
        ]);
    }
}