********************************DATA TYPE*******************************
symbol	 Expansion
 i 		 integer 	
 f 		 float			
 d 		 double			
 c 		 char

********************************VARIABLES*******************************
		Variable Declaration
		syntax:  var_typ var_name.data_type;

		for Example:
			var_typ demo.i;
			It means  demo is integer type variable

Variable Declaratios Rules:
	
	1. '_' underscore can be used as a variable name
		
		Valid =>	var_typ a_.f;
		
	3. Initialization of the variable should be done after declaration .
		
		Invalid => var_typ a.f = 10;
		Valid   => var_typ a.f;
					a = 10;

					
*********************************ARRAY***********************************
Array Declaration
		syntax:  array array_name.data_type[SIZE];

		for Example:
			array demo.i[100];
			It means  demo is array of integers having 100 elements ;

Variable Declaratios Rules:
	
	1. '_' underscore can be used as a variable name
		
		Valid =>	array arr_.f[100];
		
	3. Initialization of the variable should be done after declaration .
		
		Invalid => array a.i[5] = {10,20,30,40,50};
		Valid   => array a.i[5];
					a[0] = 10;
					a[1] = 20;
					.
					.
					a[4] = 50;
					
*********************************FUNCTION********************************
	syntax : function return_type function_name(parameters);
				[

				];
	for Example =>
			function var_typ.i dummy(var_typ m.i,var_typ n.f); for No parameters leave blanck eg . function var_typ.i dummy();
			[

			]; 
			NOTE =>For No parameters leave blanck eg . function var_typ.i dummy();
			NOTE =>You can also delcare array as a parameter eg . var_typ.i dummy(array a.i[10]);
Rules For using the function =>  
	1. Don't Declare functions only defination is enough .
	2. First Declare All the function then call 

***********************************INPUT/OUTPUT**********************************
		write() =>
		1. used to write on the stdin  
		2. After Every "write()" new line is appended.
		Example =>
				For Example : 
				var_typ a.i,b.f;
				a = 10 , b = 20; 
				write(a.i,b.f);

				Output:	
				10 20 

		read()  =>
		1. used to take the input from the user
		For Example=>
				var_typ a.i;
				read(a.i);
				write(a.i);

				Input :
				5
				Output :
				5
	

****************************************OPERATORS*********************************** 
		 Logical and Bitwise operators 
		 -lt : <
		 -gt : >
		 -le : <=
		 -ge : >=
		 -ne : !=
		 -et : ==
	   -dand : &&
	    -dor : ||
	    -and : &
	     -or : |
	     Arithmatic Operator
	     + , - , / , % , *
	     
	     Increment 
	     	Pre 	++a
			Post 	a++
	     
	     Decrement
	     	Pre 	--a
			Post 	a--

*************************************CONDITONAL STATEMENT***************************** 
			
			1 . if statement

			Syntax => 
			
			if condition ;
			[
				statements;
			];

			var_typ a.i,b.i;
			a = 20 , b = 12 ;
			if a -lt b;
			[
				write(a.i);
			];


			2. if...else
            
			Syntax : 
			
			if condition ;
			[
				statements;
			];
			else;
			[
			statements;
			];

			var_typ a.i,b.i;
			a = 20 , b = 12 ;
			if a -lt b;
			[
				write(a.i);
			];
			else;
			[
				write(b.i);
			];


****************************************ITERATIVE STATEMENTS***************************
			1 . loop =>
				Syntax => 
						loop var_init , condition , operation ;
						[
							statements;
						]; 
			For Example :
				var_typ a.i;
				loop a=0,a lt 2,a++;
				[
				write(a.i);
				];
				Output:
					0
					1



****************************************GIVE_BACK**************************************
		give_back var_name ;
		 
		 same as in c language

		var_typ a.i;
		return a;

###########################################################################################################################################

                                             
											 THE ABOVE RULES ARE ONLY APPLICABLE


For Example

Question => 
			Factorial of a no 			
            

			Input : 
			n Number whose factorial is to be find

	function var_typ.i fact(var_typ n.i);
	[
	    var_typ factorial.i , i.i ;
		factorial=1;
		loop i=1 , i -le n , i++ ;
		[
		   factorial=factorial * i ; 
		];
		give_back factorial;
	];

	var_typ n.i,;
    read(n.i);
	n = fact(n);
	write(n.i);
	