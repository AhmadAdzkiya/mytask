<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Print with Dom-pdf</title>
      <style>
         body
         {
         background-color: #f5f5f0;
         font:14px Georgia, serif, calibri;
         }
         .footer { position: fixed; bottom: 0px; }
         .pagenum:before { content: counter(page); }
         .container{
         padding-top: 90px
         }
         .panel-primary
         {
         border-color: #bce8f1;
         }
         .panel-heading 
         {
         color: #31708f;
         background-color: #d9edf7;
         border-color: #bce8f1;
         padding: 0px 0px 10px 10px;
         }
         table {
         border-collapse: collapse;
         width: 100%;
         }
         th, td {
         padding: 8px;
         text-align: left;
         border-bottom: 1px solid #ddd;
         }
         .header {
         position: fixed;
         font-size: 30px;
         padding: 30px 0px 0px 30%;
         }
         .header {
         top: 0;
         }
      </style>
   </head>
   <body>
      <div class="header">
         Print with Dompdf
      </div>
      <div class="footer">Page: <span class="pagenum"></span></div>
      <div class="container">
         <div class="row">
            <div class="col-md-10">
               <div class="panel panel-primary">
                  <div class="panel-heading">
                     <h2><i class="fa fa-user" aria-hidden="true"></i>Users</h2>
                     <div class="panel-ctrls"></div>
                     <a href="<?= bs('Users/print_users') ?>">
                     <i class="fa fa-print" style="padding-left: 90%;color: black"></i>
                     </a>
                  </div>
                  <div class="panel-body no-padding">
                     <div id="demo">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th>User Name</th>
                                 <th>First Name</th>
                                 <th>Last Name</th>
                                 <th>Email</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($all_users as $user):?>
                              <tr>
                                 <td><?php echo htmlspecialchars($user->username,ENT_QUOTES,'UTF-8');?></td>
                                 <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                                 <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                                 <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?>
                                 </td>
                              </tr>
                              <?php endforeach;?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>