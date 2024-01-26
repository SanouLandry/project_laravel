<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparaison;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ArticleExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $articles=DB::table('articles')
                    ->join('reference_prixes','articles.id','=','reference_prixes.idArticle')
                    ->get(['libelleArticle','referenceArticle','quantiteMax','quantiteMin','codeArticle','prixDeVente']);

        return $articles;
    }
    public function headings(): array
    {
        return[
            'Libelle Article',
            'Référence Article',
            'Quantité Maximum',
            'Quantité Minimum',
            'Code Article',
            'Prix de Vente'
        ];
    }
}
