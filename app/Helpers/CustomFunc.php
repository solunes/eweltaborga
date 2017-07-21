<?php 

namespace App\Helpers;

use Form;

class CustomFunc {

    public static function get_custom_node_array($array, $page, $admin = false) {
        $subarray = [];
        switch ($page->customized_name) {
            case 'home':
                $subarray['content_home'] = \App\Content::getCode('home')->content;
                $subarray['services'] = \App\Type::with('services')->get();
                $subarray['members'] = \App\Member::get();
            break;
            case 'services':
                $subarray['services'] = \App\Type::with('services')->get();
            break;
        }
        $array['nodes'] = $subarray;
        return $array;
    }

    public static function get_node_array($array, $page, $admin = false) {
        $subarray = [];
        $array_node_names = [];
        $array_nodes = [];
        switch ($page->customized_name) {
            case 'about': $array_nodes = ['about'=>'content'];                   
            break;
            case 'members': $array_nodes = ['member'];                   
            break;
            case 'contact': $array_nodes = ['contact','contact-form'];                   
            break;
        }
        $subarray = [];
        foreach($array_nodes as $node_val => $node_name){
            $node = \Solunes\Master\App\Node::where('name', $node_name)->first();
            $nodes[$node_name] = $node;
            $subarray = \FuncNode::get_items_array($node, $node_val);
            $array['nodes'][$node_name.$node_val] = ['node'=>$node, 'subarray'=>$subarray];
        }
        $array = \CustomFunc::get_scripts_array($array, $nodes);
        return $array;
    }

    public static function get_scripts_array($array, $nodes) {
        $script_array = [];
        foreach($nodes as $node){
            if($node->folder=='form'){
                array_push($script_array, 'form');
                $array['form_array'] = \FuncNode::get_items_array($node);
            } else if(in_array($node->name, ['photo','video','participant'])){
                //array_push($script_array, 'lightbox');
                array_push($script_array, 'masonry');
            } else if(in_array($node->name, ['member', 'publication'])){
                array_push($script_array, 'masonry');
            } else if(in_array($node->name, ['project', 'contact'])){
                array_push($script_array, 'map');
                array_push($script_array, 'locations-'.$node->name);
                $array['location_array'] = \FuncNode::get_items_array($node);
                if($node->name=='project'){
                    array_push($script_array, 'owl-project');
                }
            } else if(in_array($node->name, ['banner'])){
                array_push($script_array, 'banner');
            }
            $array['script_array'] = $script_array;
        }
        return $array;
    }
    
    public static function before_migrate_actions() {
        // Acciones
    }

    public static function after_migrate_actions() {
        // Acciones
    }
    
    public static function before_seed_actions() {
        return 'Before seed realizado correctamente.';
    }

    public static function after_seed_actions() {
        return 'After seed realizado correctamente.';
    }

    public static function custom_get_items($subarray, $node, $node_val) {
        $items = $subarray['items'];
        /*if($node->name=='blog'){
            $items = $items->orderBy('created_at', 'DESC');
        }*/
        $subarray['items'] = $items;
        return $subarray;
    }

    public static function get_sitemap_array($lang) {
        $array = [];
        /*if($lang=='es'){
            $array['member'] = ['url'=>'miembro/', 'url_id'=>'slug', 'priority'=>'0.7'];
            $array['article'] = ['url'=>'articulo/', 'url_id'=>'slug', 'priority'=>'0.5'];
        }*/
        return $array;
    }

    public static function add_node_array($node, $admin) {
        if($node->name=='article'){
            $cocab = \App\Article::where('member_id', 1)->orderBy('created_at', 'DESC')->get();
            if(!request()->has('member_id')||request()->input('member_id')!=1){
                $cocab = $cocab->take(3);
            }
            return ['cocab'=>$cocab];
        } else {
            return false;
        }
    }
         
    public static function check_permission($type, $module, $node, $action, $id = NULL) {
        // Type = list, item
        $return = 'none';
        if($node->name=='temp-file'){
            if($type=='list'){
                $return = 'true';
            }
        }
        return $return;
    }

    public static function custom_node_request($node, $items, $action, $req_value) {
        if($action=='orderCocabFirst'){
            $items = $items->orderByRaw(\DB::raw("FIELD(member_id, '1') DESC"));
        }
        return $items;
    }

    public static function custom_filter($array, $items, $appends, $field_name, $custom_data) {
        if($custom_data=='project_member'){
            $array['filter_options'][$field_name] = ['any'=>trans('admin.any')]+\App\Member::where('type','member')->orderBy('name','ASC')->lists('name','id')->toArray();
            $custom_value = 'any';
            if(request()->input('f_'.$field_name)){ $custom_value = request()->input('f_'.$field_name); }
            if($custom_value!='any'){
                $appends['f_'.$field_name] = $custom_value;
                $items = $items->where($field_name, $custom_value);
            }
        }
        return ['array'=>$array, 'appends'=>$appends, 'items'=>$items];
    }


}