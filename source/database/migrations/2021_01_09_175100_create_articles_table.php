<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $j_data = file_get_contents(dirname(__DIR__, 1) . '/data/produits.json');
        $a_data = json_decode($j_data, true);

        $data = [];

        foreach($a_data["t_produit"] as $d) {
            $tmp = [
                "barcode"      => $d["prd_codebarre"],
                "name"         => $d["prd_nom"],
                "created_at"   => $d["prd_datecrea"],
                "updated_at"   => $d["prd_datemodif"],
            ];

            array_push($data, $tmp);
        }

        Schema::create('articles', function (Blueprint $table) {
            $table->string("barcode", 50)->index()->unique();
            $table->string("name", 50)->unique();
            $table->timestamps();
        });

        DB::table('articles')->insertOrIgnore($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
