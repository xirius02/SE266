<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form action="#" method="GET">
    <fieldset class="table table-dark">
        <div class="table table-dark" style="width: 11.5%; margin-left: 40%; margin-top: 1%; margin-bottom: 1%;">
        <label>Search</label>
        <input name="dataone" type="search" class="form-control input-sm" placeholder="Search by Zipcode" />
        <input name="datatwo" value="data2" type="hidden" />
        <input type="hidden" name="action" value="sort" />
        </div>
        <div class="table table-dark" style="width: 15%; margin-left: 40%; margin-top: 1%; margin-bottom: 1%;">
        <label >Form of view:  </label>
        <label >Asc <input type="radio" id="ascending" name="asc" value="ascending" checked /></label>
        <label >Desc <input type="radio" id="descending" name="asc" value="descending" /></label>
        <br/>
        </div>
        <div class="table table-dark" style="width: 15%; margin-left: 40%; margin-top: 1%; margin-bottom: 1%;">
        <label>Group By</label>  
        <select name="datatwo">
            <option value="zipcode">Zipcode</option>
            <option value="owner">owner</option>
        </select>
        <br/>
         <input type="hidden" name="action" value="search" />
         <input class="btn btn-primary" type="submit" name="submit1" value="Submit" />
        <input class="btn btn-warning" type="reset" name="reset" value="Reset" />
        </div>
    </fieldset>
</form>