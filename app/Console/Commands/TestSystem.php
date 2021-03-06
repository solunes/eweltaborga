<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestSystem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test-system';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Revisa el sistema.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(){
        $this->info('Comenzando la prueba.');
        $this->info('Node Translation. Model:');
        foreach(\Solunes\Master\App\NodeTranslation::where('singular', 'like', '%model.%')->get() as $item){
            $this->info($item->singular);
        }
        $this->info('Field Translation. Field:');
        foreach(\Solunes\Master\App\FieldTranslation::where('label', 'like', '%fields.%')->get() as $item){
            $this->info($item->label);
        }
        $this->info('Field Option Translation. Admin:');
        foreach(\Solunes\Master\App\FieldOptionTranslation::where('label', 'like', '%admin.%')->get() as $item){
            $this->info($item->label);
        }
        $this->info('Finalizaron las pruebas.');
    }
}
