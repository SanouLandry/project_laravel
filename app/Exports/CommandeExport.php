<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparaison;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CommandeExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $commandes=DB::table('commandes')
                    ->join('composers','commandes.id','=','composers.idCommande')
                    ->join('articles','articles.id','=','composers.idArticle')
                    ->get(['libelleCommande','referenceCommande','libelleArticle','prixArticle','quantite','dateCommande']);
        return $commandes;
    }
    public function headings(): array
    {
        return[
            'Libellé commande',
            'Référence commande',
            'Libellé Article',
            'prixArticle',
            'Quantité',
            'Date Commande'
        ];
    }
}
