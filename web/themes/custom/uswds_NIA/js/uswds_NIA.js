jQuery(function ($) {
	var currentProject = $("#projectNumber div").html();
	var projectIDs = [];
	var projectURLs=[];

	//put project IDs in array
	$('.dataset-item-list li.dataset-detail-item a').each(function (i, e) {
	  projectIDs.push($(e).html());
	});

	//put project urls in array
	$('.dataset-item-list li.dataset-detail-item a').each(function (i, e) {
	  projectURLs.push($(e).attr('href'));
	});

	var projectIndex=$.inArray(currentProject, projectIDs);
	if($.inArray(currentProject, projectIDs) != -1) {

    	//handling previous button
    	if(projectURLs[projectIndex-1]){
    		$('#prevProjectBtn').attr("href", projectURLs[projectIndex-1]);
    	}else{
    		//change prev button style
    		$('#prevProjectBtn').addClass("disabled");
    	}

    	//handling next button
    	if(projectURLs[projectIndex+1]){
    		$('#nextProjectBtn').attr("href", projectURLs[projectIndex+1]);
    	}else{
    		//change next button style
    		$('#nextProjectBtn').addClass("disabled");
    	}

    	//project counter
    	$("#currentProjectIndex").html(projectIndex+1);

    	//project total
    	$("#projectTotal").html(projectIDs.length);
	}


	//vars for completion tracker
	var completionCurrent = parseInt( $('#block-views-block-dataset-details-block-2 header').html());
	var completionTotal = parseInt( $('#block-views-block-dataset-details-block-1 header').html());
	var completionPercent= (((completionCurrent/completionTotal) * 100) + '%');
	$('#datasetProgress').attr({"value":completionCurrent,"max":completionTotal});
	$('#datasetProgress').html(completionPercent);
	$('#datasetProgress').after("&nbsp;"+completionPercent);
});
