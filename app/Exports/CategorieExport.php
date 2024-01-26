<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparaison;
use Maatwebsite\Excel\Concerns\WithHeadings;



class CategorieExport implements  FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $categories=DB::table('articles')
                ->join('categoriesarticles','articles.idCategorieArticle','=','categoriesarticles.idCategorie')
                ->join('reference_prixes','reference_prixes.idArticle','=','articles.id')
                ->get(['libelleCategorie','libelleArticle','referenceArticle','quantiteMax','quantiteMin','codeArticle','prixDeVente']);
        return $categories;
    }
    public function headings(): array
    {
        return[
            'Libelle Categorie',
            'Libelle Article',
            'Reference Article',
            'Quantité Maximum',
            'Quantité Minimum',
            'Code Article',
            'Prix de Vente'
        ];
    }



}
