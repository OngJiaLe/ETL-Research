<?php

namespace Jwhulette\Pipes\Tests\Unit;

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Jwhulette\Pipes\Extractors\CsvExtractor;
use Jwhulette\Pipes\Transformers\CaseTransformer;
use Jwhulette\Pipes\Transformers\TrimTransformer;
use Jwhulette\Pipes\Loaders\CsvLoader;
use App\Models\Aeon;
use Jwhulette\Pipes\EtlPipe;
use Illuminate\Support\Facades\Storage;


class AeonSeeder extends Seeder
{

    protected string $testFile = Storage::get('storage\app\AeonDailyCAG.CSV');


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        dd($this->testFile);
        // $csvFile = ;
        /**
         * * Storage::path('AeonDailyCAG.CSV'
         *
         *
         *
         */

        // $csvFile = Storage::path('storage\app\AeonDailyCAG.CSV');

        // dd($csvFile);

        $pipe = new EtlPipe();

        $pipe->extract(new CsvExtractor($this->testFile));

        $pipe->transformers([
            (new CaseTransformer())->transformColumn('test', 'lower'),
        ]);
        $pipe->load(new CsvLoader('test'));


        dd($pipe);

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
