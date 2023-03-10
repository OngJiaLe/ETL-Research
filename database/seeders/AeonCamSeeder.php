<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Jwhulette\Pipes\EtlPipe;
use Jwhulette\Pipes\Extractors\CsvExtractor;
use Jwhulette\Pipes\Transformers\CaseTransformer;
use Jwhulette\Pipes\Transformers\TrimTransformer;
use Jwhulette\Pipes\Loaders\SqlLoader;
class AeonCamSeeder extends Seeder
{
    protected $testFile = 'storage\app\2023.01 Aeon Daily CAM.CSV';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pipe = new EtlPipe();

        $pipe->extract(new CsvExtractor($this->testFile));

        $pipe->transformers([
            new CaseTransformer([], 'lower'),
            new TrimTransformer(),
        ]);
        $pipe->load(new SqlLoader('aeon_cam', 'mysql'));
        $pipe->run();
    }
}
