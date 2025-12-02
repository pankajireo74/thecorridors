const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

if(urlParams.has('cstm_ppc_channel')){
    const cstm_ppc_channel = urlParams.get('cstm_ppc_channel');
    Set_Cookie('cstm_ppc_channel', cstm_ppc_channel, 30); //the number 30 = 30 days
}
if(urlParams.has('cstm_ppc_campaign')){
    const cstm_ppc_campaign = urlParams.get('cstm_ppc_campaign');
    Set_Cookie('cstm_ppc_campaign', cstm_ppc_campaign, 30);
}
if(urlParams.has('cstm_ppc_placement')){
    const cstm_ppc_placement = urlParams.get('cstm_ppc_placement');
    Set_Cookie('cstm_ppc_placement', cstm_ppc_placement, 30);
}
if(urlParams.has('cstm_ppc_device')){
    const cstm_ppc_device = urlParams.get('cstm_ppc_device');
    Set_Cookie('cstm_ppc_device', cstm_ppc_device, 30);
}
if(urlParams.has('cstm_ppc_keyword')){
    const cstm_ppc_keyword = urlParams.get('cstm_ppc_keyword');
    Set_Cookie('cstm_ppc_keyword', cstm_ppc_keyword, 30);
}
if(urlParams.has('campaign_code')){
    const campaign_code = urlParams.get('campaign_code');
    Set_Cookie('campaign_code', campaign_code, 30);
}
if(urlParams.has('gclid')){
    const gclid = urlParams.get('gclid');
    Set_Cookie('gclid', gclid, 30);
}

if(urlParams.has('utm_source')){
    const utm_source = urlParams.get('utm_source');
    Set_Cookie('utm_source', utm_source, 30);
}

