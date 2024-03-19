<div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
            
          <div class="title">Add Fate</div>
            <div class="sales-details">
                    <form class="inputform row" enctype="multipart/form-data" action="<?= base_url()."pig/add_fate"?>" method="post">
                        <div class="form-group col-md-4">
                            <label for="breed" class="control-label">Fate Name:</label>
                            <input type="text" id="breed" value="<?= $fate?>" name="fate" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="editor" class="control-label">Description:</label>
                            <textarea name="description" id="editor" cols="30" rows="10"><?= $description?></textarea>
                        </div>
 
                        <div class="form-group-long">
                            <button type="submit" class="mybuttongreen">Submit</button>
                            <button type="submit" class="mybutton">Reset</button>
                            <button type="submit" class="mybutton">Update</button>
                            <button type="submit" class="mybuttonred">Delete</button>
                        </div>
                    </form>
            </div>
        </div>
       
      </div>
   
     
    </div>