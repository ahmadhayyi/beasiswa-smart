<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nisn = [ "1265318100", "1265318101", "1265318102", "1265318103", "1265318104", "1265318105", "1265318106", "1265318107", "1265318108", "1265318109", "1265318110", "1265318111", "1265318112", "1265318113", "1265318114", "1265318115", "1265318116", "1265318117", "1265318118", "1265318119", "1265318120", "1265318121", "1265318122", "1265318123", "1265318124", "1265318125", "1265318126", "1265318127", "1265318128", "1265318129", "1265318130", "1265318131", "1265318132", "1265318133", "1265318134", "1265318135", "1265318136", "1265318137", "1265318138", "1265318139", "1265318140", "1265318141", "1265318142", "1265318143", "1265318144", "1265318145", "1265318146", "1265318147", "1265318148", "1265318149", "1265318150", "1265318151", "1265318152", "1265318153", "1265318154", "1265318155", "1265318156", "1265318157", "1265318158", "1265318159", "1265318160", "1265318161", "1265318162", "1265318163", "1265318164", "1265318165", "1265318166", "1265318167", "1265318168", "1265318169", "1265318170", "1265318171", "1265318172", "1265318173", ]; 
        $nama = [ "SALMA ANIQOTIZZAHRO", "MUKHAMMAD FAHMI ASSYIDIQI", "M KEVIN MAULANA ARIF", "NABILA AULIARAHMA", "TASYA LUTFIYATUR RAHMA ADLY", "MUHAMAD UBAYDILLAH DZULQARNAIN", "SUKMA ASA ETIKA RAMADINA", "MUHAMMAD UMAR FARUQ", "NUZILA ADDINA FAHMA", "WINDA PINANDHITA WAHYU", "MUHAMMAD SYUKRON RIZQILLAH", "ASNA ZAHROL MA'RIFAH", "AMALIYYAH JAZILLA", "ANASTASYA CHOIRUN NISA'", "WILDAN ADIB ZUHAIRI", "MUHAMMAD SHOFYAN AL KHARISH", "ALIA NAJALI INAYATI ROBBI", "DWIKI PRIYATAMA DEF SANDAR", "UNTARI", "M. DZIKRI ALFILLA", "SITI MUFIDAH AINUN NABILA", "IGA WULANDA  SUKMA", "AHMAD NOOR RAIHAN RABBANY", "REGY IKA CAHYANI", "FITRI AYU KHUSUMA NINGRUM", "ERIC MARTADINATA", "IQLIMA NOURA AZKIYA", "SAFIRA SALSABILA", "MOHAMMAD NABIL IHSAN", "WARDATUL MUCHARROMAH", "FIDAH NAJILBASYIROH", "KHADIJATUL ALYA", "NIZAR FIRMAN ARDI SAPUTRA", "M. FAQIH IBRAHIM AL-FATHI", "LU'LU YULIANA", "MUHAMAD KHAKIM HARUN AR-RASYID", "DWI AYU ANASTHASYIAH SUWANDAYANI", "MUHAMMAD ELSIANO GIBRAN ALKAF", "MUHAMMAD ARFAN WALID", "FARISAH HABIBAH HUSNA", "ZAKARIYA ABDAU", "FAWAZ HUSNI MUBAROK", "GPCB ROBIATUL ADAWIYAH", "LAILA FITRIA HANAZ SAJIDAH", "AHMAD BAIHAQI ADI PUTRO", "AULIA NUR SAKINAH MH", "KHAIRUNNISA ABBAS", "DIO ZHAFRAN PERMANA", "MUHAMMAD IQBAL SUMANG", "TRISTAN RAJASA DIANINDRA", "ADITYA RAHMAT RAMADHAN", "NISRINA AFIF ILHAMI", "KHOLILUL AIZA", "ASTA SANGHIKA HUTUWAH", "NAZALINA SILVIA ARIFANI", "ZAHROTUL ASHFIYA", "FIRMANSYAH BAYHAQI ASHTHOFA", "EKO KURNIAWAN RIZKY SAMUDRA", "DICKY TEGAR SUBAKAT", "IMROATUL WAHIDAH", "NAAFI' FITRIANI SRI SUNDARI", "ANGGY NAFISATUZ ZAHRA", "ABBIYU AZEL BUDI DANENDRA", "AGUS PUTRA PRATAMA", "ADITYA PUTRA PERMANA", "MARCHELLA ZAHRA AFIFFAH", "FEBBY DEAS YASYIFA", "JAYA SUSILA", "ABDUL HAKIM RAFSANJANI", "NUGRAHENI NURAINI", "FAJAR DWI PRAYOGA", "KHAIRANA NURADLI PUTRA", "ILHAM MU'ARIFIN", "SYAUQI MUHAMMAD FAJAR RAHMAT ALHAJIR" ];

        for ($i = 0; $i < count($nama); $i++) {
            $tanggal = rand(1, 31);
            $bulan = rand(1, 12);
            $tahun = rand(2003, 2004);
            $tanggal_lahir[] = $tanggal . "-" . $bulan . "-" . $tahun;
            $jenis_kelamin = [ "wanita", "pria", "pria", "wanita", "wanita", "pria", "wanita", "pria", "wanita", "wanita", "pria", "wanita", "wanita", "wanita", "pria", "pria", "wanita", "pria", "wanita", "pria", "wanita", "wanita", "pria", "wanita", "wanita", "pria", "wanita", "wanita", "pria", "wanita", "wanita", "wanita", "pria", "pria", "wanita", "pria", "pria", "pria", "pria", "wanita", "pria", "pria", "pria", "wanita", "pria", "wanita", "wanita", "pria", "pria", "pria", "pria", "wanita", "wanita", "pria", "wanita", "wanita", "pria", "pria", "pria", "wanita", "pria", "pria", "pria", "pria", "pria", "wanita", "pria", "pria", "pria", "pria", "pria", "pria", "pria", "pria" ];
        }

        for ($i=0; $i < count($nama); $i++) { 
            Siswa::create([
                'nisn' => $nisn[$i],
                'nama_lengkap' => $nama[$i],
                'tanggal_lahir' => $tanggal_lahir[$i],
                'jenis_kelamin' => $jenis_kelamin[$i],
                'alamat' => '-',
            ]);
        }
    }
}
