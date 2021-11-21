<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;
use function React\Promise\all;

class BdController extends Controller
{
    public function createBdView()
    {

        $tablesName = ['products', 'supplieritem', 'pharmitem'];
        /*DB::select("SELECT table_name FROM information_schema.tables
WHERE table_schema = 'bd'");*/
        $dbName=DB::connection()->getDatabaseName();
        foreach ($tablesName as $name) {
            $data[] = DB::table("$name")->get();
            $rowsName[] = DB::select("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$name'AND TABLE_SCHEMA = '$dbName'");
        }
        return view('bdView', ['Names' => $tablesName, 'data' => $data, 'rowsName' => $rowsName]);
    }

    public function changeData()
    {
        $arr = $_POST['data'];
        $tableName = $_POST['tableName'];
        DB::table($tableName)
               ->where('ID', $arr['ID'])
               ->update($_POST['data']);
        return ['msg' => "Таблица $tableName успешно обновлена"];
    }

    public function deleteData()
    {

        $tableName = $_POST['tableName'];
       DB::table($tableName)
               ->where('ID', $_POST['ID'])
               ->delete();
        return ['msg' => "Таблица $tableName успешно удалена"];
    }
}
