<?php

namespace Jwhulette\Pipes\Tests\Unit;

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Jwhulette\Pipes\Extractors\CsvExtractor;
use Jwhulette\Pipes\Transformers\CaseTransformer;
use Jwhulette\Pipes\Transformers\TrimTransformer;
use Jwhulette\Pipes\EtlPipe;
use Jwhulette\Pipes\Loaders\SqlLoader;

class AeonCagSeeder extends Seeder
{
    // * Has to be string to be inserted into CsvExtractor file
    protected $testFile = 'storage\app\2023.01 Aeon Daily CAG.CSV';


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
        $pipe->load(new SqlLoader('aeon_cag', 'mysql'));
        $pipe->run();

        // dd($this->testFile);
        // $csvFile = ;
        /**
         * * Storage::path('AeonDailyCAG.CSV'
         *
         *
         *
         */

        // $csvFile = Storage::path('storage\app\AeonDailyCAG.CSV');

        // dd($csvFile);

        // $testFile = Storage::get('AeonDailyCAG.CSV');


        // dd($pipe);

        // dd(serialize($pipe));

        // AEON::insert([serialize($pipe)]);
        // AEON::insert([(new EtlPipe())
        //     ->extract(new CsvExtractor($this->testFile))
        //     ->transformers([
        //         new CaseTransformer([], 'lower'),
        //         new TrimTransformer(),
        //     ])
        //     ->load(new CsvLoader('saved-file.csv'))
        //     ]);

        // $pipe = new EtlPipe();

        // $pipe->extract(new CsvExtractor($this->testFile));

        // $pipe->transformers([
        //     (new CaseTransformer())->transformColumn('test', 'lower'),
        // ]);

        // $pipe->load(new CsvLoader('test'));

        // $this->assertInstanceOf(EtlPipe::class, $pipe);

    }
}
