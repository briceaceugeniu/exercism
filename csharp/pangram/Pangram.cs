using System;
using System.Collections.Generic;

public static class Pangram
{
    public static bool IsPangram(string input)
    {
        var lowercaseAsciiLetters = GetAsciiLetters();
        foreach (var c in input)
        {
            lowercaseAsciiLetters.Remove(char.ToLower(c));

            if (lowercaseAsciiLetters.Count == 0)
            {
                return true;
            }
        }
        return false;
    }
    private static List<char> GetAsciiLetters()
    {
        var lowercaseAsciiLetters = new List<char>();
        for (var i = (int)'a'; i < (int)'z'; i++)
        {
            lowercaseAsciiLetters.Add((char)i);
        }
        return lowercaseAsciiLetters;
    }

}
