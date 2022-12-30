<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\ContactTag;
use App\Models\Tag;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ContactsImport implements ToModel, WithEvents, WithStartRow

{


    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        HeadingRowFormatter::extend('custom', function($value, $key) {
            return strtolowwer($value); 
        });

        return new Contact([
             'id'           => $row[0],
             'lastname'     => $row[1],
             'firstname'     => $row[2],
             'patrony'     => $row[3],
             'email'     => $row[4],
             'phone'     => $row[5],
        ]);
              
    }

    public function registerEvents(): array
    {
        return [

            AfterImport::class => [self::class, 'afterImport'],
                        
        ];
    }

   public static function afterImport(AfterImport $event) 
    {    
        //
    }

}
