<!DOCTPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
<title>MailBox</title>
</head>
<body>
  <div class="container">
  <div class="table-responsive">

    <div style="width:100%;height:100px;"></div>
    <form  action="{{ route('mailbox.search', [isset($_GET['search'])?$_GET['search']:'']) }}">
    <input type="text" id="search" name="search" placeholder="Search Anything.." title="Type in a name">
    <input type="submit" >
  </form>
    <table class="table" id="myTable">
    <tr class="header">
    <th>From</th>
    <th>To</th>
    <th>Sent Date</th>
    <th>Subject</th>
    <th>Action</th>
    </tr>
    @foreach ($emails as $mail)
    <tr>
    <td>{{ $mail->from }}</td>
    <td>{{ $mail->to }}</td>
    <td>{{ $mail->sent_date }}</td>
    <td>{{ $mail->subject }}</td>
    <td><i class="icon-trash"></i>
        <a style="color:black" href="{{ route('mailbox.delete', $mail->uid) }}">
            delete
        </a>
  </td>
    </tr>
    @endforeach
    <tr>
      <td colspan="5">
        {{ $emails->links() }}
      </td>
    </tr>
    </table>
</div>
</div>
</body>
</html>
