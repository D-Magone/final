window.addEventListener('load', function() {

	//sortable function without db
	$( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );

	//Save button hide and show
	$('#saveBtn').hide();

	$('input[name=description]').keyup(function(){
		if($.trim($(this).val()).length  <= 0)$('#saveBtn').hide()
		else $('#saveBtn').show()
	});
	
	//opening page, checked items remain at bottom of table
	$("input[type='checkbox']").prop("checked", function() {
		var $this = $(this);
		var row = $this.closest('tr');
		if ($this.prop('checked')) { // move to bottom
			row.insertAfter(row.parent().find('tr:last-child'));

			$('#tableT tr:last-child td:last-child').hide();
			
		} else { // move to top
			row.insertBefore(row.parent().find('tr:first-child'));

			$('#tableT tr:first-child td:last-child').show();
		}
	});

	//submit checkbox, change value, send to pagefor database input
		$('body').on('change', '.done', function(){
			
			this.value = this.checked?1:0;
			var list_id = $(this).data('list-id');

			var $this = $(this);
			var row = $this.closest('tr');
			if ($this.prop('checked')) { // move to bottom
				row.insertAfter(row.parent().find('tr:last-child'));
				$('#tableT td:last').hide();
			} else { // move to top
				row.insertBefore(row.parent().find('tr:first-child'));
				$('#tableT td:last').show();
			}

			$.post('/final/controllers/checkController.php', {done: this.value, list_id: list_id}, function(data) {
			});
		});
});
/*

CREATE DATABASE final_project;

CREATE TABLE `user` (
  user_id int(20) unsigned NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  password char(60) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
)


CREATE TABLE `list` (
  list_id int(10) unsigned NOT NULL AUTO_INCREMENT,
  description varchar(150) NOT NULL,
  done tinyint(1) unsigned NOT NULL DEFAULT '0',
  user_id int(20) unsigned NOT NULL,
  PRIMARY KEY (`list_id`),
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
)
*/