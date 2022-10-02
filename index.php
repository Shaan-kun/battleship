<style>
	ul {
		font-family: "Courier New", serif;
		list-style-type: none;
	}
</style>

<?php
	
	session_start();

	$DEBUG = true; // на релизе изменить на false


	function get_files_map($dir='') {
		/*
			Возвращает массив файлов и папок, рекурсивно обходя все подкаталоги.
		*/

		// получаем файлы в текущем каталоге и удаляем служебные

		$pre_files = scandir($dir == '' ? '.' : $dir);
		unset($pre_files[0]);
		unset($pre_files[1]);

		// собираем массив файлов и каталогов

		$files = [];
		foreach ($pre_files as $key => $value) {
			// убираем файлы Git из карты
			if (strpos($value, '.git') !== false)
				continue;

			if (!is_dir($dir . $value))
			{
				$arr = [
					'name' => $value,
					'type' => 'file',
					'path' => $dir . $value,
				];
			}
			else
			{
				$arr = [
					'name' => $value,
					'type' => 'folder',
					'path' => $dir . $value,
					'files' => get_files_map($dir . $value . '/')
				];
			}

			array_push($files, $arr);
		}

		return $files;
	}

	function print_files_map($files, $level=0) {
		echo '<ul>';

		foreach ($files as $key => $value) {
			// все файлы будут со ссылками
			if ($value['type'] == 'file')
				echo '<li><a href="' . $value['path'] . '">' . $value['name'] . '</a></li>';
			else
				echo '<li>' . $value['name'] . '</li>';

			if ($value['type'] == 'folder' && $value['files'])
			{
				print_files_map($value['files'], $level + 1);
			}
		}

		echo '</ul>';
	}


	if ($DEBUG) {
		echo '<h1>Карта сайта</h1>';
		echo '<p>Вы видите это сообщение, потому что сайт находится в режиме отладки. Чтобы выключить режим отладки, нужно изменить значение DEBUG на false.</p>';

		$arr = get_files_map();
		print_files_map($arr);

		// echo '<pre>';
		// print_r($arr);
		// echo '</pre>';
	}
	else {
	    if (isset($_SESSION['user']))
	    {
	        header('Location: rating.php');
	    }
    }