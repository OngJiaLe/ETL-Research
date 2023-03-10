<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Jwhulette\Pipes\Extractors\CsvExtractor;
use Jwhulette\Pipes\EtlPipe;
use Jwhulette\Pipes\Extractors\XlsxExtractor;
use Jwhulette\Pipes\Transformers\CaseTransformer;
use Jwhulette\Pipes\Transformers\TrimTransformer;
use Jwhulette\Pipes\Loaders\SqlLoader;

class ParksonCagSeeder extends Seeder
{
    protected $testFile = 'storage\app\2023.01 Parkson Daily CAG.xlsx';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pipe = new EtlPipe();

        $pipe->extract(new XlsxExtractor($this->testFile));

        $pipe->transformers([
            new CaseTransformer([], 'lower'),
            new TrimTransformer(),
        ]);
        $pipe->load(new SqlLoader('parkson_cag', 'mysql'));
        $pipe->run();
    }
}
