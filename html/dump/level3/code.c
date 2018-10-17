#include "stdio.h"
int main(void) { int fact(int n){ int factorial;int i;factorial=1;for(i=1 ; i <= n ; i++){ factorial=factorial * i;} return factorial;} int n;scanf("%d",&n);n = fact(n);printf("%d",n);}
