@extends('admin.layout.menu')
@section('contenter')

<script type="text/javascript">
  $(document).ready(function() {
    $.ajaxSetup({

      headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

      }

    });
    $('#lala').on('click', function (e) {
        // e.preventDefault();
        var id = $("input[name=testid]").val();
        console.log(id);
        var post_url ='/api/admin/article/detail/post/'+id;

        console.log(post_url);

        // var id = $(this).attr('data-id');
        
        $.ajax({
          type: "get",
          url: post_url,
          success:function(data){
          alert("success!! let go");
          window.location.href = "/api/admin/article/detail/post/"+id;


      }
        });
      });
  });

</script>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th >danh mục</th>
      <th>kết quả</th>
    </tr>
  </thead>
  <tbody>
     <tr>
      <td><STRONG class="text-center">The Basic</STRONG></td>
    </tr>  	     
    <tr>
      <th scope="row">0</th>
      <td>Route</td>
      <td><a href="{{ route('admin.manager.dashboard') }}">Route dashboard</a></td>
    </tr>  	 
    <tr>
      <th scope="row">1</th>
      <td>Middleware</td>
      <td>đang nhap bằng tài khoản khác và vào <a href="/admin"> trang này</a> để kiểm tra nếu đúng admin hoặc lam thai gia huy thi vào được không se báo lỗi authenticate</td>
    </tr>  	     
    <tr>
      <th scope="row">2</th>
      <td>CSRF Protection</td>
      <td>day la trang co CSRF <a href="/test/me/cotoken"> có </a> day la trang khong CSRF <a href="/test/me/khongtoken"> không </a> nếu có token thì sẽ pass qua không thì báo lỗi 419</td>
    </tr>            
    <tr>
      <th scope="row">3</th>
      <td>Request</td>
      <td>vao day de xem cach hoat dong cua request <a href="/test/me/checkre"> check </a> </td>
    </tr>               
    <tr>
      <th scope="row">4</th>
      <td>Responses</td>
      <td>vao day de xem cach hoat dong cua Responses <a href="/test/me/reqp"> check </a> </td>
    </tr>       
    <tr>
      <th scope="row">5</th>
      <td>URL generate</td>
      <td>


            <input type="num" name="testid" placeholder="input yours id" id="lala">

      </td>
    </tr>      
    <tr>
      <th scope="row">6</th>
      <td>Error Log</td>
      <td>
          <form action="/test/me/error" method="get">
            <input type="num" name="tes" placeholder="input yours id">
            <input type="submit" name="submit">
          </form>

            

      </td>
    </tr>   

    <tr>
      <th scope="row">8</th>
      <td>logging</td>
      <td><a href="/test/me/logging">test logging</a>xem log bằng storage/app/laravel.log cấp quyền 755 cho nó ghi log , config log trong mục config/app =>log muốn làm log cập nhật nhiều hơn thì thêm 'log_max_files' => 30 do mặc định log chỉ save trong 5 ngày</td>
    </tr>
    <tr>
      <td><STRONG class="text-center">Front-end</STRONG></td>
    </tr>    
    <tr>
      <th scope="row">9</th>
      <td>Localization</td>
      <td>bấm vào <a href="/admin">đây</a> để đổi ngôn ngữ sử dụng localization + middleware + session =>config app local => vn or en </td>
    </tr> 
   <tr>
      <td><STRONG class="text-center">Security</STRONG></td>
    </tr>        
    <tr>
      <th scope="row">10</th>
      <td>Authentication</td>
      <td>bấm vào đây bạn sẽ thấy dòng "nếu đăng nhập rồi bạn sẽ thấy cái này" <a href="{{ route('testauth') }}">đây</a> còn chưa đăng nhập sẽ thấy cái này "của mấy cậu chưa đăng nhập" </td>
    </tr> 
      
    <tr>
      <th scope="row">7</th>
      <td>đây là chỗ được encrypted lại nà :</td>
      <td>{{$encrypted}}</td>
    </tr>    
    <tr>
      <th scope="row">11</th>
      <td>đây là chỗ được decrypted lại nà :</td>
      <td>{{$decrypted}}</td>
    </tr>
    <tr>
    <tr>
      <th scope="row">14</th>
      <td>đây là chỗ được hash lại nà :</td>
      <td>{{$hash}}</td>
    </tr>
    <tr>
      <th scope="row">15</th>
      <td>đây là chỗ được check hash lại nà :</td>
      <td>{{$checkhash}}</td>
    </tr>   
      <td><STRONG class="text-center">Digging Deeper</STRONG></td>
    </tr>
    <tr>
      <th scope="row">12</th>
      <td>đây là chỗ được collect lại nà :</td>
      <td>{{$collection}}</td>
    </tr>
    <tr>
      <th scope="row">13</th>
      <td>đây là chỗ được đơn dữ liệu collect lại nà :</td>
      <td>{{$collection0}}</td>
    </tr>

     <tr>
      <th scope="row">16</th>
      <td>mail</td>
      <td><a href="/admin/mail">mail</a></td>
    </tr>     
    <tr>
      <th scope="row">17</th>
      <td>notification nà :v</td>
      <td><a href="/admin/user">notification khi tao user moi</a></td>
    </tr>   
     <tr>
      <th scope="row">18</th>
      <td>task schedule nà :v</td>
      <td><a href="/admin">bấm php artisan delete:cron hoặc vào crontask-e</a></td>
    </tr> 
     <tr>
      <th scope="row">19</th>
      <td>package</td>
      <td><a href="/admin">ConsoleTV (chart)</a> \ <a href="/admin/article">CSV</a></td>
    </tr>
    <tr>
      <td><STRONG class="text-center">Database</STRONG></td>
    </tr> 
    <tr>
      <th scope="row">20</th>
      <td>Query builder</td>
      <td>cái này là lấy dữ liệu bằng db query nà <strong>{{$user7db}}</strong> cái này lấy của model <strong>{{$user7m}}</strong></td>
    </tr> 
    <tr>
      <th scope="row">21</th>
      <td>Pagination</td>
      <td>vào controller của AdminController => articlemanager() kết quả là <a href="/admin/article">đây</a> :v</td>
    </tr> 
    <tr>
      <th scope="row">22</th>
      <td>Migrate + Seeder</td>
      <td>nếu fresh nhưng muốn seed ra vài fake dữ liệu thì :v bấm thế này cho lẹ <strong>php artisan migrate:fresh --seed</strong> muốn tạo thêm seed thì vào database -> seeds -> DatabaseSeeder còn muốn seed thôi thì bấm <strong>php artisan db:seed</strong>, seed 1 table cụ thể thì bấm vậy <strong>php artisan db:seed --class=UserSeeder</strong> </td>
    </tr> 
    <tr>
      <th scope="row">23</th>
      <td>eloquent collect</td>
      <td>tìm thử thằng người dùng có trong db không 
          <form action="/test/me/collectelo" method="get">
            <input type="num" name="tes" placeholder="input yours id">
            <input type="submit" name="submit">
          </form>
      </td>
    </tr>

    <tr>
      <th scope="row">24</th>
      <td>Api</td>
      <td>kết quả <a href="/admin/category"> đây</a> trang này chạy bằng chức năng bằng api</td>
    </tr>    
    
     <tr>
      <th scope="row">25</th>
      <td>Eloquent: Serialization</td>
      <td>          
        <form action="/test/me/serializeelo" method="get">
            <input type="num" name="tes" placeholder="input yours id">
            <input type="submit" name="submit">
        </form>
      </td>
    </tr> 
      <tr>
      <td><STRONG class="text-center">Đang và chưa xem xong </STRONG></td>
    </tr>   

    <tr>
      <th scope="row">24</th>
      <td>Authorization</td>
      <td><a href="https://laravel.com/docs/7.x/authorization"> authorization</a></td>
    </tr>    
        <tr>
      <th scope="row">24</th>
      <td>Redis</td>
      <td><a href="https://laravel.com/docs/7.x/redis"> redis</a></td>
    </tr>    
        <tr>
      <th scope="row">24</th>
      <td>Eloquent-mutators</td>
      <td><a href="https://laravel.com/docs/7.x/eloquent-mutators"> eloquent-mutators</a></td>
    </tr>    
        <tr>
      <th scope="row">24</th>
      <td>Eloquent-serialization</td>
      <td><a href="https://laravel.com/docs/7.x/eloquent-serialization"> eloquent-serialization</a> <p>còn hơi mù mờ</p></td>
    </tr>    
    <tr>
      <th scope="row">24</th>
      <td>Notifications</td>
      <td><a href="https://laravel.com/docs/7.x/notifications"> notifications</a> <p>còn hơi mù mờ</p></td>
    </tr>    
        
    <tr>
      <th scope="row">24</th>
      <td>Cache</td>
      <td><a href="https://laravel.com/docs/7.x/cache"> cache</a></td>
    </tr>    
            
    <tr>
      <th scope="row">24</th>
      <td>Broadcasting</td>
      <td><a href="https://laravel.com/docs/7.x/broadcasting"> broadcasting</a></td>
    </tr>                
    <tr>
      <th scope="row">24</th>
      <td>Queues</td>
      <td><a href="https://laravel.com/docs/7.x/queues"> queues</a></td>
    </tr>        
    <tr>
      <th scope="row">24</th>
      <td>Filesystem</td>
      <td><a href="https://laravel.com/docs/7.x/filesystem"> filesystem</a> <p>còn hơi mù mờ</p></td>
    </tr>       
     <tr>
      <th scope="row">24</th>
      <td>Events</td>
      <td><a href="https://laravel.com/docs/7.x/events"> events</a></td>
    </tr>    
    

  </tbody>
</table>



</div>
@endsection