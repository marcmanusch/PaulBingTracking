{extends file='parent:frontend/index/index.tpl'}

{block name='frontend_index_header_javascript'}

	{$smarty.block.parent}

	{include file='frontend/index/bing_tracking.tpl'}

{/block}
