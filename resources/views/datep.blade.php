<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-date-range-picker/0.14.2/daterangepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.16.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-date-range-picker/0.14.2/jquery.daterangepicker.min.js"></script>
    <style>
        #out:focus #ccc{
  display: none;
}
    </style>
  </head>
  <body>
    
    <input id='out' placeholder="mm/dd/yy to mm/dd/yy"style='font-size: 14pt; width: 20em;' />
    <span id='i' class="fa fa-calendar"></span>
    <div id='ccc'></div>
  </body>

  <script>
      $('#i').dateRangePicker({
  inline: true,
  format: 'MM-DD-YYYY',
  container: '#ccc',
  alwaysOpen: false,
  singleMonth: true,
  showTopbar: false,
  setValue: function(s)
	{
		
			$(this).val('12-01-2017');
	}
})
.bind('datepicker-change', (e,data) => {
  $('#out').val(data.value);
})
  </script>
</html>
      