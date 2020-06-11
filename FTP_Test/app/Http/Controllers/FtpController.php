<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function GuzzleHttp\Psr7\str;

class FtpController extends Controller
{
    function index()
    {
        return view('retrieve');
    }

    function store(Request $request)
    {

        if ($request->hasFile('profile_image')) {

            //get filename with extension
            $filenamewithextension = $request->file('profile_image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('profile_image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

            //Upload File to external server
            Storage::disk('ftp')->put($filenametostore, fopen($request->file('profile_image'), 'r+'));

            //Store $filenametostore in the database
        }

        return back()->with('status', "Image uploaded successfully.");
    }

    function getByDirectory(Request $request)
    {

        $movie_directory_paths = Storage::disk('sftp')->directories('Movies');
        for ($i = 0; $i < count($movie_directory_paths); $i++) {
            $movie_directories[$i] = substr($movie_directory_paths[$i], strlen('Movies/'));
        }
        //return $movie_directories;
        $directoy = 'Movies/' . $movie_directories[$request->index];
        $movie_file_addresses = Storage::disk('sftp')
            ->allFiles($directoy);

        for ($i = 0; $i < count($movie_file_addresses); $i++) {
            $pos = strpos($movie_file_addresses[$i], "]/");
            $send_data[$i] = [
                'title' => substr($movie_file_addresses[$i], $pos + 2),
                'year' => substr($movie_file_addresses[$i], strlen($directoy) + 1, 4),
                'path' => '/data1/' . $directoy . $movie_file_addresses[$i],
            ];

        }

        return $send_data;
    }

    function getByYear(Request $request)
    {
        /*
          "parameters" : [
            mi = $index_of_movie_folder,
            yi = $index_of_movie_year,
        ]
        */

        $prfix = 'Movies';
        $movie_folders = Storage::disk('sftp')->directories('Movies');

        for ($i = 0; $i < count($movie_folders); $i++)
            $only_movie_folders[$i] = substr($movie_folders[$i], strlen($prfix) + 1);

        $imf = $index_of_movie_folder = $request->mi;

        $my = Storage::disk('sftp')->directories($prfix . '/' . $only_movie_folders[$imf]);

        $imy = $index_of_movie_year = $request->yi;

        for ($i = 0; $i < count($my); $i++)
            $years[$i] = substr($my[$i], strlen($prfix . '/' . $only_movie_folders[$imf] . '/'));

        $movies = Storage::disk('sftp')
            ->allFiles($prfix . '/' . $only_movie_folders[$imf] . '/' . $years[$imy]);

        $j = 0;
        for ($i = 0; $i < count($movies); $i++) {
            if (!strpos($movies[$i], '.png') && !strpos($movies[$i], '.srt')
                && !strpos($movies[$i], '.jpg')) {
                $movie_full_path = str_replace($prfix . '/' . $only_movie_folders[$imf] . '/' . $years[$imy] . '/', '', $movies[$i]);
                $pos = strpos($movie_full_path, '/');
                $title = substr($movie_full_path, $pos + 1);
                $title2 = str_replace($title, '', $movie_full_path);
                $title2 = strrev(substr(strrev($title2), 8));
                $data[$j++] = [
                    'title' => $title,
                    'title2' => $title2,
                    'year' => $years[$imy],
                    'path' => "/var/www/html/data1/" . $movies[$i],
                ];
            }
        }
        return $data;
    }

    function scanTvSeries(Request $request)
    {
        /*
         ti = ts_folders index
        */
        $prefix = 'TVSeries';
       // /*
        //for all file scan
        //$ati = Storage::disk('sftp')->allFiles($prefix);
        $tsf = Storage::disk('sftp')->directories($prefix);

        for ($i=1, $j=0; $i<count($tsf); $i++)
            $ts_folders[$j++] = str_replace($prefix.'/', '', $tsf[$i]);
        //return $ts_folders;
        //for type wise file scan
        $ati = Storage::disk('sftp')->allFiles($prefix.'/'.$ts_folders[$request->ti]);

        $j = 0;
        for ($i = 0; $i < count($ati); $i++) {

            if (!strpos($ati[$i], '.png') && !strpos($ati[$i], '.srt')
                && !strpos($ati[$i], '.jpg') && !strpos($ati[$i], '.sync')) {
                $ati[$i];
                //type & title define

                $str = str_replace($prefix.'/', '', $ati[$i]);
                $type = substr($str, 0, strpos($str, '/'));
                $str2 = str_replace($prefix.'/'.$type.'/', '', $ati[$i]);
                $series_title = substr($str2, 0, strpos($str2, '/'));
                $str3 = str_replace($prefix.'/'.$type.'/'.$series_title.'/', '', $ati[$i]);
                $season = substr($str3, 0, strpos($str3, '/'));
                return $file_title = str_replace($prefix.'/'.$type.'/'.$series_title.'/'.$season.'/', '', $ati[$i]);


                //end of type & title define
                $data[$j++] = [
                    'title' => $series_title,
                    'path' => 'http://43.230.123.18/' . $ati[$i],
                    'video_type' => 'tvSeries',
                    'type' => $type,
                ];
            }
        }
        return $data;
    }


}
