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

        $tablesName = DB::select("SELECT table_name FROM information_schema.tables
WHERE table_schema = 'bd'");
        foreach ($tablesName as $name) {
            $data[] =DB::table("$name->table_name")->get();
            $rowsName[] = DB::select("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$name->table_name'AND TABLE_SCHEMA = 'bd'");
        }
        $users=new User();
        dd($users->all()->get(0)->email);
            return view('bdView', ['Names' => $tablesName, 'data' => $data, 'rowsName' => $rowsName]);
        }
    }
