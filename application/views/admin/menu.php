<!DOCTYPE html>
<html>
<head>
	<title>E-PESANTREN | Admin Page</title>
</head>
<style type="text/css">
a{
	text-decoration: none;
}
	body{
		background-color: cyan;
		padding: 0;
		margin: 0;
	}

</style>
<body>
	<div style="margin-left: auto;margin-right: auto;width: 700px;text-align: center;margin-top: 30px;font-size: 30pt;">E-PESANTREN COMING SOON</div>
	<div style="margin-left: auto;margin-right: auto;margin-top: 50px;background-color: blue;width: 400px;height: 40px;border-radius: 25px 25px 25px 25px;text-align: center;padding-top: 18px;font-size: 15pt;color: white;">Welcome , <?= $admin['nama'] ?></div>
	<a href="<?= base_url('admin/admin/alarm'); ?>"><div style="margin-left: auto;margin-right: auto;margin-top: 40px;background-color: violet;width: 400px;height: 40px;border-radius: 25px 25px 25px 25px;text-align: center;padding-top: 18px;font-size: 15pt;color: white;font-style: normal;">ALARM</div>
	
	</a>

</body>
</html>