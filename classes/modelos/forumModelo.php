<?php
	namespace modelos;


	class forumModelo
	{
		
		public function listarForum(){
			$listarForuns = \MySql::conectar()->prepare("SELECT * FROM `tb_foruns`");
			$listarForuns->execute();
			$foruns = $listarForuns->fetchAll();
			include('views/forum_home.php');
		}

		public function listarTopicos($idForum){
			$forumNome = \MySql::conectar()->prepare("SELECT * FROM `tb_foruns` WHERE id = ?");
			$forumNome->execute(array($idForum));
			$forumInfo = $forumNome->fetch();
			$listarTopicos = \MySql::conectar()->prepare("SELECT * FROM `tb_forum.topicos` WHERE forum_id = ?");
			$listarTopicos->execute(array($idForum));
			$topicos = $listarTopicos->fetchAll();
			include('views/topicos.php');
		}

		public function listarPosts($arr){
			$idForum = $arr[1];
			$idTopico = $arr[2];
			$nomeForum = \MySql::conectar()->prepare("SELECT * FROM `tb_foruns` WHERE id = ?");
			$nomeForum->execute(array($idForum));
			$nomeForum = $nomeForum->fetch()['nome'];
			$nomeTopico = \MySql::conectar()->prepare("SELECT * FROM `tb_forum.topicos` WHERE id = ?");
			$nomeTopico->execute(array($idTopico));
			$nomeTopico = $nomeTopico->fetch()['nome'];
			$pegarPosts = \MySql::conectar()->prepare("SELECT * FROM `tb_forum.posts` WHERE topico_id = ?");
			$pegarPosts->execute(array($idTopico));
			$pegarPosts = $pegarPosts->fetchAll();
			include('views/topico_single.php');
		}


		
	}
?>