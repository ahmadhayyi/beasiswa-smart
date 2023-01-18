<?php

namespace Database\Seeders;

use App\Models\Nilai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // $nilai = [[85, 95, 85], [94, 81, 91], [92, 91, 95], [93, 86, 87]];
        $nilai = [ 
            [1416, 1420, 1406, 1404, 1386, 1413, 1392, 1413, 1400, 1400, 1405, 1403, 1410, 1410, 1411, 1399, 1401, 1403, 1398, 1401, 1383, 1408, 1400, 1380, 1396, 1390, 1389, 1396, 1400, 1380, 1386, 1385, 1393, 1386, 1375, 1390, 1393, 1380, 1395, 1392, 1397, 1404, 1388, 1379, 1391, 1386, 1388, 1379, 1385, 1389, 1381, 1383, 1375, 1372, 1369, 1376, 1381, 1375, 1377, 1368, 1365, 1364, 1359, 1372, 1359, 1351, 1361, 1365, 1375, 1319, 1345, 1355, 1346, 1347],
            [ 1434, 1415, 1411, 1419, 1422, 1416, 1425, 1404, 1418, 1420, 1392, 1409, 1414, 1414, 1398, 1396, 1410, 1404, 1416, 1402, 1410, 1407, 1405, 1406, 1412, 1398, 1402, 1409, 1391, 1408, 1405, 1395, 1396, 1400, 1411, 1394, 1398, 1391, 1393, 1404, 1385, 1402, 1396, 1395, 1399, 1390, 1400, 1394, 1385, 1384, 1392, 1400, 1387, 1393, 1402, 1401, 1386, 1393, 1378, 1381, 1405, 1374, 1379, 1382, 1382, 1379, 1385, 1374, 1394, 1399, 1364, 1367, 1363, 1345 ],
            [ 791, 780, 791, 778, 789, 767, 777, 773, 770, 764, 786, 771, 758, 757, 762, 774, 758, 760, 751, 760, 770, 747, 756, 775, 749, 765, 762, 748, 760, 760, 756, 766, 756, 757, 755, 756, 749, 768, 749, 741, 754, 729, 747, 754, 735, 749, 737, 749, 752, 745, 744, 734, 754, 750, 742, 736, 744, 739, 742, 739, 717, 746, 745, 729, 739, 749, 731, 737, 699, 747, 751, 738, 729, 704 ],
            [4, 1, 3, 2, 4, 0, 3, 3, 2, 2, 1, 1, 4, 4, 0, 0, 3, 0, 0, 2, 0, 2, 0, 2, 1, 3, 2, 0, 2, 1, 4, 0, 0, 2, 4, 0, 3, 4, 2, 3, 2, 1, 0, 0, 4, 2, 1, 4, 4, 2, 0, 1, 0, 3, 3, 1, 4, 2, 0, 0, 2, 2, 4, 3, 2, 0, 3, 3, 0, 1, 3, 4, 2, 2],
        ];
        for ($i=0; $i < count($nilai[0]); $i++) {
            for ($j=0; $j < count($nilai); $j++) {
                Nilai::create([
                    'siswa_id' => $i+1,
                    'bobot_id' => $j+1,
                    'nilai' => $nilai[$j][$i],
                ]);
            }
        }
    }
}
