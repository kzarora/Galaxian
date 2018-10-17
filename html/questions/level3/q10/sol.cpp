#include <iostream>
using namespace std;

int main()
{
 int t;
 cin>>t;
 while(t--) {
 string s;
 cin>>s;
 int wall = 0, boom=0;
 for(int i=0;i<s.size();i++) {
 if(s[i]=='W') {
 wall = wall==2?wall:wall+1;
 }
 else {
 boom+=wall;
 wall=0;
 if(i+1<s.size() && s[i+1]=='W') {
 boom++;i++;
 if(i+1<s.size() && s[i+1]=='W') {
 boom++;i++;
 }
 }
 }
 }
 cout<<boom<<endl;
 }
 return 0;
}
