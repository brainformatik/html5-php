<?php
namespace HTML5\Parser;

/**
 * Interface for stream readers.
 */
interface InputStream {

  /**
   * Returns the current line that is being consumed.
   *
   * TODO: Move this to the tokenizer.
   */
  public function currentLine();

  /**
   * Returns the current column of the current line that the tokenizer is at.
   *
   * Newlines are column 0. The first char after a newline is column 1.
   *
   * @TODO Move this to the tokenizer.
   *
   * @return int
   *   The column number.
   */
  public function columnOffset();

  /**
   * Retrieve the currently consumed character.
   */
  public function char();

  /**
   * Get all characters until EOF.
   *
   * This consumes characters until the EOF.
   */
  public function remainingChars();

  /**
   * Read to a particular match (or until $max bytes are consumed).
   *
   * This operates on byte sequences, not characters.
   *
   * Matches as far as possible until we reach a certain set of bytes
   * and returns the matched substring.
   *
   * @see strcspn
   * @param string $bytes
   *   Bytes to match.
   * @param int $max
   *   Maximum number of bytes to scan.
   * @return mixed
   *   Index or FALSE if no match is found. You should use strong 
   *   equality when checking the result, since index could be 0.
   */
  public function charsUntil($bytes, $max = null);

  /**
   * Returns the string so long as $bytes matches.
   *
   * Matches as far as possible with a certain set of bytes
   * and returns the matched substring.
   *
   * @see strspn
   * @param string $bytes
   *   A mask of bytes to match. If ANY byte in this mask matches the 
   *   current char, the pointer advances and the char is part of the 
   *   substring.
   * @param int $max
   *   The max number of chars to read.
   */
  public function charsWhile($bytes, $max = null);

  /**
   * Unconsume one character.
   */
  public function unconsume();

  /**
   * Retrieve the next character without advancing the pointer.
   */
  public function peek();

  /**
   * Get the position of the reader.
   */
  public function position();
}
