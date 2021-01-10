<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Article;

class ArticleController extends Controller
{
    public static $ERROR_RESPONSE = ['error' => 1, 'message' => 'An error occured.', 'infos' => null];

    public static $SUCCES_RESPONSE = ['error' => 0, 'infos' => null];

    public function getAll() : Response
    {
        self::$SUCCES_RESPONSE['infos'] = Article::get();

        return Response(self::$SUCCES_RESPONSE);
    }

    public function getOne(string $barcode) : Response
    {
        self::$SUCCES_RESPONSE['infos'] = Article::where('barcode', $barcode)->first();

        return Response(self::$SUCCES_RESPONSE);
    }

    public function new(Request $request) : Response
    {
        try {
            Article::insert([
                'barcode'       => $request->barcode,
                'name'          => $request->name,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);

            return Response(self::$SUCCES_RESPONSE);
        } catch (\Throwable $th) {
            self::$SUCCES_RESPONSE['message'] = $th->getMessage();
            return Response(self::$ERROR_RESPONSE);
        }
    }

    public function edit(Request $request, string $barcode) : Response
    {
        try {
            Article::where('barcode', $barcode)->update([
                'name'          => $request->name,
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);

            return Response(self::$SUCCES_RESPONSE);
        } catch (\Throwable $th) {
            self::$SUCCES_RESPONSE['message'] = $th->getMessage();
            return Response(self::$ERROR_RESPONSE);
        }
    }

    public function delete(string $barcode) : Response
    {
        try {
            Article::where('barcode', $barcode)->delete();

            return Response(self::$SUCCES_RESPONSE);
        } catch (\Throwable $th) {
            self::$SUCCES_RESPONSE['message'] = $th->getMessage();
            return Response(self::$ERROR_RESPONSE);
        }
    }
}
