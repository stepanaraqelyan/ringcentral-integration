<?php if(empty($me)): ?>
	<?php if(!empty($err)): ?>
		<div class="alert alert-danger">
			<?=$err?>
		</div>
	<?php endif ?>
	<form action="index.php" method="post">
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" id="username" name="username" class="form-control" />
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" id="password" name="password" class="form-control" />
		</div>
		<button name="op_type" value="login" class="btn btn-primary">Sign In</button>
	</form>

<?php else: ?>

	<script>var token = '<?=$me->token?>';</script>
	<br />

	<div class="table-responsive">
		<table class="table" id="datatbl">
			<thead>
				<tr>
					<th>Call Date</th>
					<th>Inbound Number</th>
					<th>Outbound Number</th>
					<th>Duration</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($operators as $op): ?>
					<tr>
						<td><?=(new DateTime($op->call_date))->format('d.m.Y H:i')?></td>
						<td><?=$op->inbound_number?></td>
						<td><?=$op->outbound_number?></td>
						<td><?=$op->duration?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
<?php endif ?>