<form action="{{ route('sender') }}" method="post">
     @csrf 

     <input type="text" name="content" id="">
     <input type="submit" value="Submit">

</form>