<?php

// Useful patterns for the Cronkite site

// The editor will crash upon going to the Pattern tab
// if you don't also register a block pattern category

function cronkite_register_block_patterns()
{
	if (class_exists('WP_Block_Patterns_Registry')) {

		// register categories
		register_block_pattern_category('cronkite', [
			'label' => _x('Cronkite', 'textdomain'),
		]);
	}

	// register patterns
	register_block_pattern('cronkite/4-up-icon-cards', [
		'title' => 'Four-up icon cards',
		'description' => 'Four cards with icons',
		'content' =>
		"<!-- wp:acf/background-section {\"id\":\"block_60e8daf0f0889\",\"name\":\"acf/background-section\",\"data\":{\"field_603819ea114a9\":\"pattern\",\"field_607f30538c20f\":\"default\",\"field_60381aa3114aa\":\"morse-code-black\"},\"align\":\"\",\"mode\":\"preview\"} -->\n<!-- wp:wp-bootstrap-blocks/container {\"marginAfter\":\"mb-0\"} -->\n<!-- wp:wp-bootstrap-blocks/row {\"template\":\"custom\"} -->\n<!-- wp:wp-bootstrap-blocks/column {\"sizeMd\":3} -->\n<!-- wp:acf/uds-card {\"id\":\"block_60e8dc6cf088a\",\"name\":\"acf/uds-card\",\"data\":{\"field_602f0c315bfc0\":\"Lorem Ipsum\",\"field_602f0c412559a\":\"Lorem ipsum dolor sit amet.\",\"field_602f0b39b4c29\":\"basic\",\"field_602f0b5660bc4\":\"icon\",\"field_602f0beaa8637\":\"rocket\",\"field_602f0c2622823\":\"vertical\",\"field_603d52a9b2db1\":\"0\",\"field_602f0cc0abbc7\":\"\",\"field_602f0e97702ae\":\"\",\"field_602f0f084ce05\":\"\"},\"align\":\"\",\"mode\":\"preview\"} /-->\n<!-- /wp:wp-bootstrap-blocks/column -->\n\n<!-- wp:wp-bootstrap-blocks/column {\"sizeMd\":3} -->\n<!-- wp:acf/uds-card {\"id\":\"block_60e8dc9af088b\",\"name\":\"acf/uds-card\",\"data\":{\"field_602f0c315bfc0\":\"Lorem Ipsum\",\"field_602f0c412559a\":\"Lorem ipsum dolor sit amet.\",\"field_602f0b39b4c29\":\"basic\",\"field_602f0b5660bc4\":\"icon\",\"field_602f0beaa8637\":\"user\",\"field_602f0c2622823\":\"vertical\",\"field_603d52a9b2db1\":\"0\",\"field_602f0cc0abbc7\":\"\",\"field_602f0e97702ae\":\"\",\"field_602f0f084ce05\":\"\"},\"align\":\"\",\"mode\":\"preview\"} /-->\n<!-- /wp:wp-bootstrap-blocks/column -->\n\n<!-- wp:wp-bootstrap-blocks/column {\"sizeMd\":3} -->\n<!-- wp:acf/uds-card {\"id\":\"block_60e8dcc1f088c\",\"name\":\"acf/uds-card\",\"data\":{\"field_602f0c315bfc0\":\"Lorem Ipsum\",\"field_602f0c412559a\":\"Lorem ipsum dolor sit amet.\",\"field_602f0b39b4c29\":\"basic\",\"field_602f0b5660bc4\":\"icon\",\"field_602f0beaa8637\":\"ribbon\",\"field_602f0c2622823\":\"vertical\",\"field_603d52a9b2db1\":\"0\",\"field_602f0cc0abbc7\":\"\",\"field_602f0e97702ae\":\"\",\"field_602f0f084ce05\":\"\"},\"align\":\"\",\"mode\":\"preview\"} /-->\n<!-- /wp:wp-bootstrap-blocks/column -->\n\n<!-- wp:wp-bootstrap-blocks/column {\"sizeMd\":3} -->\n<!-- wp:acf/uds-card {\"id\":\"block_60e8dd02f088d\",\"name\":\"acf/uds-card\",\"data\":{\"field_602f0c315bfc0\":\"Lorem Ipsum\",\"field_602f0c412559a\":\"Lorem ipsum dolor sit amet.\",\"field_602f0b39b4c29\":\"basic\",\"field_602f0b5660bc4\":\"icon\",\"field_602f0beaa8637\":\"desktop\",\"field_602f0c2622823\":\"vertical\",\"field_603d52a9b2db1\":\"0\",\"field_602f0cc0abbc7\":\"\",\"field_602f0e97702ae\":\"\",\"field_602f0f084ce05\":\"\"},\"align\":\"\",\"mode\":\"preview\"} /-->\n<!-- /wp:wp-bootstrap-blocks/column -->\n<!-- /wp:wp-bootstrap-blocks/row -->\n<!-- /wp:wp-bootstrap-blocks/container -->\n<!-- /wp:acf/background-section -->",
		'categories' => ['cronkite'],
	]);

	register_block_pattern('cronkite/blockquote', [
		'title' => 'Blockquote',
		'description' => 'Wraps a blockquote in a container',
		'content' =>
		"<!-- wp:wp-bootstrap-blocks/container -->\n<!-- wp:wp-bootstrap-blocks/row {\"template\":\"custom\"} -->\n<!-- wp:wp-bootstrap-blocks/column {\"sizeMd\":8} -->\n<!-- wp:acf/uds-blockquote {\"id\":\"block_60e76f9b57fe5\",\"name\":\"acf/uds-blockquote\",\"data\":{\"field_602c64c2f0dcd\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\",\"field_602c6539f0dce\":\"Lorem Ipsum\",\"field_602c658af0dcf\":\"\",\"field_602c6279c09d8\":\"0\",\"field_602c63e7c09db\":\"gold\",\"field_602c637dc09da\":\"none\",\"field_603ffa83a5fbd\":\"0\"},\"align\":\"\",\"mode\":\"preview\"} /-->\n<!-- /wp:wp-bootstrap-blocks/column -->\n\n<!-- wp:wp-bootstrap-blocks/column {\"sizeMd\":4} /-->\n<!-- /wp:wp-bootstrap-blocks/row -->\n<!-- /wp:wp-bootstrap-blocks/container -->",
		'categories' => ['cronkite'],
	]);

	register_block_pattern('cronkite/three-up-cards', [
		'title' => 'Three-up cards',
		'description' => 'Three-up cards',
		'content' =>
		"<!-- wp:wp-bootstrap-blocks/container -->\n<!-- wp:wp-bootstrap-blocks/row {\"template\":\"1-1-1\"} -->\n<!-- wp:wp-bootstrap-blocks/column {\"sizeMd\":4} -->\n<!-- wp:acf/uds-card {\"id\":\"block_60b7cafc9ee4a\",\"name\":\"acf/uds-card\",\"data\":{\"field_602f0c315bfc0\":\"Lorem Ipsum\",\"field_602f0c412559a\":\"Dolor sit amet.\",\"field_602f0b39b4c29\":\"basic\",\"field_602f0b5660bc4\":\"image\",\"field_602f0bafbc593\":\"840\",\"field_602f0c2622823\":\"vertical\",\"field_603d52a9b2db1\":\"0\",\"field_602f0cc0abbc7\":\"\",\"field_602f0e97702ae\":{\"row-0\":{\"field_602f0eaece055\":\"Learn more\",\"field_602f0ebb35993\":\"#\",\"field_602f0ec7cdd06\":\"0\"},\"row-1\":{\"field_602f0eaece055\":\"\",\"field_602f0ebb35993\":\"\",\"field_602f0ec7cdd06\":\"0\"}},\"field_602f0f084ce05\":\"\"},\"align\":\"\",\"mode\":\"preview\"} /-->\n<!-- /wp:wp-bootstrap-blocks/column -->\n\n<!-- wp:wp-bootstrap-blocks/column {\"sizeMd\":4} -->\n<!-- wp:acf/uds-card {\"id\":\"block_60b7cb029ee4b\",\"name\":\"acf/uds-card\",\"data\":{\"field_602f0c315bfc0\":\"Lorem Ipsum\",\"field_602f0c412559a\":\"Dolor sit amet.\",\"field_602f0b39b4c29\":\"basic\",\"field_602f0b5660bc4\":\"image\",\"field_602f0bafbc593\":\"841\",\"field_602f0c2622823\":\"vertical\",\"field_603d52a9b2db1\":\"0\",\"field_602f0cc0abbc7\":\"\",\"field_602f0e97702ae\":{\"row-0\":{\"field_602f0eaece055\":\"Learn more\",\"field_602f0ebb35993\":\"#\",\"field_602f0ec7cdd06\":\"0\"},\"row-1\":{\"field_602f0eaece055\":\"\",\"field_602f0ebb35993\":\"\",\"field_602f0ec7cdd06\":\"0\"}},\"field_602f0f084ce05\":\"\"},\"align\":\"\",\"mode\":\"preview\"} /-->\n<!-- /wp:wp-bootstrap-blocks/column -->\n\n<!-- wp:wp-bootstrap-blocks/column {\"sizeMd\":4} -->\n<!-- wp:acf/uds-card {\"id\":\"block_60b7cb079ee4c\",\"name\":\"acf/uds-card\",\"data\":{\"field_602f0c315bfc0\":\"Lorem Ipsum\",\"field_602f0c412559a\":\"Dolor sit amet.\",\"field_602f0b39b4c29\":\"basic\",\"field_602f0b5660bc4\":\"image\",\"field_602f0bafbc593\":\"839\",\"field_602f0c2622823\":\"vertical\",\"field_603d52a9b2db1\":\"0\",\"field_602f0cc0abbc7\":\"\",\"field_602f0e97702ae\":{\"row-0\":{\"field_602f0eaece055\":\"Learn more\",\"field_602f0ebb35993\":\"#\",\"field_602f0ec7cdd06\":\"0\"}},\"field_602f0f084ce05\":\"\"},\"align\":\"\",\"mode\":\"preview\"} /-->\n<!-- /wp:wp-bootstrap-blocks/column -->\n<!-- /wp:wp-bootstrap-blocks/row -->\n<!-- /wp:wp-bootstrap-blocks/container -->",
		'categories' => ['cronkite'],
	]);

	register_block_pattern('cronkite/body-text', [
		'title' => __('Body text', 'textdomain'),
		'description' => _x(
			'Body text',
			'6 columns wide on desktop',
			'textdomain'
		),
		'content' =>
		"<!-- wp:wp-bootstrap-blocks/container -->\n<!-- wp:wp-bootstrap-blocks/row -->\n<!-- wp:wp-bootstrap-blocks/column {\"sizeMd\":6} -->\n<!-- wp:paragraph -->\n<p>Lorem ipsum</p>\n<!-- /wp:paragraph -->\n<!-- /wp:wp-bootstrap-blocks/column -->\n\n<!-- wp:wp-bootstrap-blocks/column {\"sizeMd\":6} /-->\n<!-- /wp:wp-bootstrap-blocks/row -->\n<!-- /wp:wp-bootstrap-blocks/container -->",
		'categories' => ['cronkite'],
	]);
}

add_action('init', 'cronkite_register_block_patterns');
