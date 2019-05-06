<form action="#" method="GET">
    <fieldset>
        <label>Search</label>
        <input name="dataone" type="search" placeholder="Search by Zipcode" />
        <input name="datatwo" value="data2" type="hidden" />
        <legend>Form 1</legend>
        <label>Select Form of view:</label>
        <label>Asc <input type="radio" name="asc" value="ascending" /></label>
        <label>Desc <input type="radio" name="desc" value="descending" /></label>

        
        <input type="hidden" name="action" value="sort" />
    </fieldset>
        
        <label>Group By</label>  
        <select name="datatwo">
            <option value="zipcode">Zipcode</option>
            <option value="owner">Owner</option>
        </select>
         <input type="hidden" name="action" value="search" />
        <input type="submit" value="Submit" />
        <input type="reset" name="reset" value="Reset" />
</form>