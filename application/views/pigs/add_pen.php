<div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
            
          <div class="title">Add Pen</div>
            <div class="sales-details">
                    <form class="inputform row" enctype="multipart/form-data" action="<?= base_url()."pig/add_pen"?>" method="post">
                        <div class="form-group col-md-4">
                            <label for="breed" class="control-label">Pen No:</label>
                            <input type="text" id="breed" required value="<?= $penNo?>" name="penNo" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="age" class="control-label">Age allowed:</label>
                            <input type="number" id="age" required value="<?= $age?>" name="age" class="form-control form-control-sm">
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