<div>
  
   <div class="card"></div>
   
   <table>
    
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">KTP</th>
            <th scope="col">Nama</th>
            <th scope="col">Telepon</th>
            <th scope="col">Email</th>
        </tr>
    </thead>
    @php
            $a = 0;
            $a++;
    @endphp
    @foreach ($userList as $user)
    <tbody>       
        <th scope="row">{{ $a++ }}</th>
        <td>{{ $user->no_ktp_plgn}}</td>
        <td>{{ $user->nama_plgn}}</td>
        <td>{{ $user->no_telp_plgn}}</td>
        <td>{{ $user->email_plgn}}</td>     
    </tbody>
    @endforeach
   </table>
  
</div>
