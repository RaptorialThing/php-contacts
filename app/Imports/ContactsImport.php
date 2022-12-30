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

class ContactsImport implements ToModel, WithEvents

{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Contact([
             'lastname'     => $row[0],
             'firstname'     => $row[1],
             'patrony'     => $row[2],
             'lastname'     => $row[3],
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
