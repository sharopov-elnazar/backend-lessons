de <iostream>
#include <vector>
using namespace std;

int main() {
    int N;
    cout << "Elementlar soni  kirit: ";
    cin >> N;

    vector<int> vektor;

    cout << N << " ta elementni kirit ="<<endl;;
    for (int i = 0; i < N; ++i) {
        int qiymat;
        cin >> qiymat;
        vektor.push_back(qiymat);
    }

    
    cout << "Vektor elementlari: ";
    for (int i = 0; i < vektor.size(); ++i) {
        cout << vektor[i] << " ";
    }
    cout << endl;

    return 0;
}