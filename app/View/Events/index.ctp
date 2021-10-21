<div class="lise">
<?php $this->set('title_for_layout',"AmfineXchange | Liste des évènements"); ?>

<link
	rel='stylesheet' type='text/css' href='/fullcalendar/fullcalendar.css' />
<link
	rel='stylesheet' type='text/css'
	href='/fullcalendar/fullcalendar.print.css' media='print' />
<script
	type='text/javascript' src='/fullcalendar/fullcalendar.js'></script>
<script
	type='text/javascript' src='/fullcalendar/gcal.js'></script>

<script type='text/javascript'>

	$(document).ready(function() {
	
		$('#calendar').fullCalendar({

					 events: [

<?php foreach ($events as $k => $v): ?>
	        {
            title  : '<?php echo addslashes($v['Event']['baseline']) ?>',
            start  : '<?php echo addslashes($v['Event']['date']) ?>',
            url  : '/events/show/<?php echo addslashes($v['Event']['id']) ?>'
        }
        <?php if($k != count($events)) echo "," ?>
<?php endforeach ?>

    ],
    eventClick: function(event) {
        if (event.url) {
            window.open(event.url,'_self');
            return false;
        }
    },
			loading: function(bool) {
				if (bool) {
					$('#loading').show();
				}else{
					$('#loading').hide();
				}
			}
			
		});

		
	});

</script>


<div id='loading' style='display: none'>loading...</div>
<div id='calendar'></div>

</div>