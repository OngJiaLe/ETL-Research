<?php
namespace Jwhulette\Pipes\Tests\Unit;

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Jwhulette\Pipes\EtlPipe;
use Jwhulette\Pipes\Extractors\CsvExtractor;
use Jwhulette\Pipes\Transformers\CaseTransformer;
use Jwhulette\Pipes\Transformers\TrimTransformer;
use Jwhulette\Pipes\Loaders\SqlLoader;

class SogosCagSeeder extends Seeder
{
    protected $testFile = 'storage\app\2023.01 Sogo Daily CAG CAM.csv';

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
        // $pipe->load(new CsvLoader('saved-file.csv'));
        $pipe->load(new SqlLoader('sogos_cag', 'mysql'));
        $pipe->run();

    }
}
