
<?php
 include 'partials/header.php';

 // fetch users form database but not current user 
 $current_admin_id = $_SESSION['user-id'];

 $query = "SELECT * FROM users WHERE NOT id=$current_admin_id";
 $users = mysqli_query($connection, $query);
 ?>

<section class="dashboard">
    
<?php if (isset($_SESSION['ad-user-success'])) : // shows if add user was successful ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['ad-user-success'];
                unset($_SESSION['ad-user-success']); 
                ?>
                 </p>
        </div> 
    
<?php elseif (isset($_SESSION['edit-user-success'])) : // shows if edit user was successful ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['edit-user-success'];
                unset($_SESSION['edit-user-success']); 
                ?>
                 </p>
        </div> 
          
<?php elseif (isset($_SESSION['edit-user'])) : // shows if edit user was NOT successful ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user']); 
                ?>
                 </p>
        </div> 

    
<?php elseif (isset($_SESSION['delete-user'])) : // shows if delete user was NOT successful ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['delete-user'];
                unset($_SESSION['delete-user']); 
                ?>
                 </p>
        </div> 
    
<?php elseif (isset($_SESSION['delete-user-success'])) : // shows if delete user was successful ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['delete-user-success'];
                unset($_SESSION['delete-user-success']); 
                ?>
                 </p>
        </div> 

        <?php endif ?>

    <div class="container dashboard__container">
        <button id="show__sidebar btn" class="sidebar__toggle"><i class="fa-solid fa-right-long"></i></button>
        <button id="hide__sidebar btn" class="sidebar__toggle"><i class="fa-solid fa-left-long"></i></button>

        <aside>
            <ul>
                <li><a href="ad-post.php"><i class="fa-solid fa-pen-fancy"></i>
                <h5>Add post</h5>
                </a>
            </li>

            <li><a href="index.php"><i class="fa-solid fa-address-card"></i>
                <h5>Manage post</h5>
                </a>
            </li>

            
            <?php if(isset($_SESSION['user_is_admin'])):?>
                
        

            <li><a href="ad-user.php"><i class="fa-solid fa-user-plus"></i>
                <h5>Add User</h5>
                </a>
            </li>

            <li><a href="manage-user.php" class="active"><i class="fa-solid fa-users"></i>
                <h5>Manage User</h5>
                </a>
            </li>

            <li><a href="ad-category.php"><i class="fa-solid fa-pen-to-square"></i>
                <h5>Add Category</h5>
                </a> 
            </li>

            <li><a href="manage-categories.php" ><i class="fa-solid fa-list"></i>
                <h5>Manage category</h5>
                </a>
            </li>
        <?php endif ?>
            </ul>
        </aside>
        <main>
            <h2>manage Users</h2>

            <?php if (mysqli_num_rows($users)> 0) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($user = mysqli_fetch_assoc($users)): ?>
                    <tr>
                       <td><?= "{$user['firstname']} {$user['lastname']}" ?></td>
                       <td><?= $user['username']?></td> 
                       <td><a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?= $user['id'] ?>"
                        class="btn sm">Edit</a></td>
                       <td><a href="<?= ROOT_URL ?>admin/delete-user.php?id=<?= $user['id']?>"
                        class="btn sm danger">Delete</a></td>
                       <td><?= $user['is_admin'] ? 'Yes': 'No' ?></td>
                    </tr>
            <?php  endwhile ?>
                </tbody>
            </table>
            <?php else : ?>
             <div class="alert__message error"><?= "No users found" ?></div> 
             
             <?php endif ?>
        </main>
    </div>
</section>

<?php
 include '../partials/footer.php';
 ?>