<div class="home-content">
      <div class="sales-boxes">
        <div class="recent-sales box">
            
          <div class="title">Add User </div>
            <div class="sales-details">
                    <form class="inputform row" enctype="multipart/form-data" action="<?= base_url()."user/create_user"?>" method="post">
                        <div class="form-group col-md-4">
                            <label for="name" class="control-label">First Name:</label>
                            <input type="text" id="" value="" name="fname" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lname" class="control-label">Last Name:</label>
                            <input type="text" id="lname" value="" name="lname" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email" class="control-label">Email:</label>
                            <input type="email" id="email" value="" name="email" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="id" class="control-label">Id No:</label>
                        <input type="number" id="id" value="" name="id_no" class="form-control form-control-sm">
                        </div>
                       
                        <div class="form-group col-md-4">
                            <label for="tel" class="control-label">Phone:</label>
                            <input type="tel" value="" id="tel" name="phone" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="file" class="control-label">Photo</label>
                            <input type="file" value="" id="file" name="image" accept="image/*" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gender" class="control-label">Gender</label><br>
                            <input type="radio"  value="Male" id="gender" name="gender"> Male
                            <input type="radio" class="ml-3" value="Female" id="gender" name="gender"> Female
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