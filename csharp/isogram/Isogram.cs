using System;
using System.Linq;

public static class Isogram
{
    public static bool IsIsogram(string word)
    {
        var letterInWordToArray = word.ToLower().Where(char.IsLetter).ToArray();
        return letterInWordToArray.Length == letterInWordToArray.Distinct().Count();
    }
}
