<div class="input-group input-group-outline mb-3">
            <label class="form-label"></label>
            <select name="idArticle" id="" class="form-control">
                   @foreach($articles as $listeArticles)
                        <option value="">{{ $listeArticles->libelleArticle }}</option>
                    @endforeach
            </select>  
</div>