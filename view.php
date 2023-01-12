<?php
    class View 
	{
		function generate($data = '') {
			echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		}
	}